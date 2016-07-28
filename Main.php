<?php

/**
 * @access 本程序可以参考 :  JavaTeachRespositry下的  Game2048.Methods类
 * @author Axoford12
 * @see QQ 847072154
 */
class Main
{

    /**
     *
     * @var $ran 随机生成的数据
     */
    private static $ran = array(
        2,
        4
    );

    /**
     *
     * @var score用于积分
     */
    private static $score = 0;

    /**
     * 获取一个随机坐标
     */
    private static function getRandomDimension()
    {
        return array(
            (int) rand(0, 5),
            (int) rand(0, 5)
        );
    }

    /**
     *
     * @param $mtr 传入的二维数组数据
     *            将这个二维数组添加新数据
     * @see <<2048规则>>
     */
    private static function addRanNumber($mtr)
    {}

    /**
     *
     * @param $mtr传入的二维数组， 用于显示结果            
     */
    public static function display($mtr)
    {
        for ($i = 0; $i < count($mtr); $i ++) {
            for ($j = 0; $j < count($mtr[$i]); $j ++) {
                echo "$mtr[$i][$j] ";
            }
            echo "\n";
        }
    }

    /**
     * 初始化一个二维数组。随机数据
     */
    public static function initial()
    {
        $res = array(
            array(
                0,
                0,
                0,
                0
            ),
            array(
                0,
                0,
                0,
                0
            ),
            array(
                0,
                0,
                0,
                0
            ),
            array(
                0,
                0,
                0,
                0
            )
        );
        $dimension = Main::getRandomDimension();
        $res[$dimension[0]][$dimension[1]] = Main::$ran[(int) rand(0, 2)];
        return $res;
    }

    /**
     *
     * @param $mtr 数据集合
     * @param $dirct 移动方式
     *            按照2048的规则移动数据
     */
    public static function move($mtr,$dirct)
    {
        # 这里我想换一个方式，不用Java的那种死板方法，
        # 思路是这样的  先把所有的移动抽象为向左移动，然后把所谓的左移动参数化
        # 当然啦，Java的移动方法还是比较可行的，经过了很多次的改动，但是我还是觉得挺麻烦的额
        
        # 详见 JavaTeachRespositry  Game2048.Methods 类
        # 对于这个新的移动方式，参考Python实现的方式
        
        $tmp = array(array(),array(),array(),array()); # 定义缓冲区数组
        $res = $mtr; # 定义结果数组，直接克隆自$res  下面使用集合来实现倒退步骤。       
        if($dirct < 2){
            for($i = 0;$i<4;$i++){
                for($j = 0;$j<4;$j++){
                    $tmp[$j][$i] = $mtr[$j][$i];        
                }
            }
        } else {
            for($i = 0;$i<4;$i++){
                for($j = 0;$j<4;$j++){
                    $tmp[$i][$j] = $mtr[$i][$j];
                }
            }
        }
        
        
        
        if($dirct == 0){
            ;
        } elseif ($dirct == 1) {
            ;
        } elseif ($dirct == 2) {
            ;
        } elseif ($dirct == 3) {
            ;
        } else {
            
        }
        
        ;
    }
}

?>