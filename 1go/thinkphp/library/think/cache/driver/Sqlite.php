<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace think\cache\driver;

use think\Cache;
use think\Exception;


class Sqlite
{

    protected $options = [
        'db'         => ':memory:',
        'table'      => 'sharedmemory',
        'prefix'     => '',
        'expire'     => 0,
        'length'     => 0,
        'persistent' => false,
    ];

    
    public function __construct($options = [])
    {
        if (!extension_loaded('sqlite')) {
            throw new Exception('_NOT_SUPPERT_:sqlite');
        }
        if (!empty($options)) {
            $this->options = array_merge($this->options, $options);
        }
        $func          = $this->options['persistent'] ? 'sqlite_popen' : 'sqlite_open';
        $this->handler = $func($this->options['db']);
    }

    
    public function get($name)
    {
        Cache::$readTimes++;
        $name   = $this->options['prefix'] . sqlite_escape_string($name);
        $sql    = 'SELECT value FROM ' . $this->options['table'] . ' WHERE var=\'' . $name . '\' AND (expire=0 OR expire >' . time() . ') LIMIT 1';
        $result = sqlite_query($this->handler, $sql);
        if (sqlite_num_rows($result)) {
            $content = sqlite_fetch_single($result);
            if (function_exists('gzcompress')) {
                //启用数据压缩
                $content = gzuncompress($content);
            }
            return unserialize($content);
        }
        return false;
    }

    
    public function set($name, $value, $expire = null)
    {
        Cache::$writeTimes++;
        $name  = $this->options['prefix'] . sqlite_escape_string($name);
        $value = sqlite_escape_string(serialize($value));
        if (is_null($expire)) {
            $expire = $this->options['expire'];
        }
        $expire = (0 == $expire) ? 0 : (time() + $expire); //缓存有效期为0表示永久缓存
        if (function_exists('gzcompress')) {
            //数据压缩
            $value = gzcompress($value, 3);
        }
        $sql = 'REPLACE INTO ' . $this->options['table'] . ' (var, value,expire) VALUES (\'' . $name . '\', \'' . $value . '\', \'' . $expire . '\')';
        if (sqlite_query($this->handler, $sql)) {
            if ($this->options['length'] > 0) {
                // 记录缓存队列
                $this->queue($name);
            }
            return true;
        }
        return false;
    }

    
    public function rm($name)
    {
        $name = $this->options['prefix'] . sqlite_escape_string($name);
        $sql  = 'DELETE FROM ' . $this->options['table'] . ' WHERE var=\'' . $name . '\'';
        sqlite_query($this->handler, $sql);
        return true;
    }

    
    public function clear()
    {
        $sql = 'DELETE FROM ' . $this->options['table'];
        sqlite_query($this->handler, $sql);
        return;
    }
}
