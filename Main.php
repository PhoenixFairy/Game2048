<?php

/**
 * 
 * @author Axoford12
 *
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
     *            按照2048的规则移动数据
     */
    public static function move($mtr)
    {
        ;
    }
}

?>