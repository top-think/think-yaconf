<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace think;

use Yaconf as Yc;

/**
 * 配置管理类
 */
class Yaconf
{
    /**
     * Yaconf项目名
     * @var string
     */
    protected $yaconf;

    /**
     * 设置Yaconf配置文件名
     * @access public
     * @param  string $yaconf Yaconf名称
     * @return void
     */
    public function setYaconf(string $yaconf): void
    {
        $this->yaconf = $yaconf;
    }

    /**
     * 获取实际的yaconf配置参数名
     * @access protected
     * @param  string $name 配置参数名
     * @return string
     */
    protected function getYaconfName(string $name): string
    {
        $name = strtolower($name);
        return $this->yaconf ? $this->yaconf . '.' . $name : $name;
    }

    /**
     * 加载配置文件
     * @access public
     * @param  string $file 配置文件名
     * @param  string $name 一级配置名
     * @return void
     */
    public function load(string $file, string $name = '')
    {

    }

    /**
     * 检测配置是否存在
     * @access public
     * @param  string $name 配置参数名（支持多级配置 .号分割）
     * @return bool
     */
    public function has(string $name): bool
    {
        $name = $this->getYaconfName($name);
        return Yc::has($name);
    }

    /**
     * 获取配置参数
     * @access public
     * @param  string $name    配置参数名（支持多级配置 .号分割）
     * @param  mixed  $default 默认值
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        $yaconfName = $this->getYaconfName($name);

        if (Yc::has($yaconfName)) {
            return Yc::get($yaconfName);
        }

        return false === strpos($name, '.') ? [] : $default;
    }

    /**
     * 设置配置参数 name为数组则为批量设置
     * @access public
     * @param  array  $config 配置参数
     * @param  string $name 配置名
     * @return array
     */
    public function set(array $config, string $name = null)
    {

    }

    /**
     * 获取配置参数
     * @access public
     * @param  string $name 参数名
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * 检测是否存在参数
     * @access public
     * @param  string $name 参数名
     * @return bool
     */
    public function __isset($name)
    {
        return $this->has($name);
    }

}
