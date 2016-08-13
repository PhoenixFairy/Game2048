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
            (int) rand(0, 3),
            (int) rand(0, 3)
        );
    }

    /**
     *
     * @param $mtr 传入的二维数组数据
     *            将这个二维数组添加新数据
     * @see <<2048规则>>
     */
    private static function addRanNumber($mtr)
    {
        ;
    }

    /**
     *
     * @param $data_array 移动的行/列            
     * @param $_ 是否反方向移动
     *            返回移动后数据
     */
    private static function move_line($data_array, $_)
    {
        // 思路
        // 找出本行的非零数据,直接把非零数移动
        $array = $data_array;
        if ($_) {
            for ($i = 0; $i < 4; $i ++) {
                $array[$i] = $data_array[3 - $i];
            }
        }
        $tmp_n_zero_nbr = array(); // 定义缓冲数组，记录非零数
        $tmp_area = array(
            0,
            0,
            0,
            0
        ); // 移动缓冲数据数组
        for ($i = 0; $i < 4; $i ++) {
            if ($array[$i] != 0) {
                array_push($tmp_n_zero_nbr, $array[$i]);
            }
        }
        // 将非零数写入到数组
        $count = count($tmp_n_zero_nbr);
        switch ($count) {
            case 1: // 1个非零数据
                $tmp_area[0] = $tmp_n_zero_nbr[0]; // 直接写入数组首位
                break;
            case 2: // 2个非零数据
                if ($tmp_n_zero_nbr[0] != $tmp_n_zero_nbr[1]) { // 两个数据不等
                    for ($i = 0; $i < 2; $i ++) {
                        $tmp_area[$i] = $tmp_n_zero_nbr[$i]; // 按照顺序赋值给缓冲区
                    }
                } else { // 两个数据相等
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2; // 将两数据和写入缓冲区首位
                }
                break;
            case 3:
                // 当三个非零数据,按照合成优先级判断等量关系
                // 详情参见 Game2048.Methods 类中的Commit.
                // 更新数据
                if ($tmp_n_zero_nbr[0] == $tmp_n_zero_nbr[1]) {
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2;
                    $tmp_area[1] = $tmp_n_zero_nbr[2];
                } elseif ($tmp_n_zero_nbr[1] == $tmp_n_zero_nbr[2]) {
                    $tmp_area[0] = $tmp_n_zero_nbr[0];
                    $tmp_area[1] = $tmp_n_zero_nbr[2] * 2;
                } else {
                    for ($i = 0; $i < 3; $i ++) {
                        $tmp_area[$i] = $tmp_n_zero_nbr[$i];
                    }
                }
                break;
            case 4:
                // 四个非零数据,继续按照优先级判断等量关系写入数据
                if ($tmp_n_zero_nbr[0] == $tmp_n_zero_nbr[1]) {
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2;
                    if ($tmp_n_zero_nbr[2] == $tmp_n_zero_nbr[3]) {
                        $tmp_area[1] = $tmp_n_zero_nbr[2] * 2;
                    } else {
                        $tmp_area[1] = $tmp_n_zero_nbr[2];
                        $tmp_area[2] = $tmp_n_zero_nbr[3];
                    }
                } else {
                    $tmp_area[0] = $tmp_n_zero_nbr[0];
                    if ($tmp_n_zero_nbr[1] == $tmp_n_zero_nbr[2]) {
                        $tmp_area[1] = $tmp_n_zero_nbr[1] * 2;
                        $tmp_area[2] = $tmp_n_zero_nbr[3];
                    } elseif ($tmp_n_zero_nbr[2] == $tmp_n_zero_nbr[3]) {
                        $tmp_area[1] = $tmp_n_zero_nbr[1];
                        $tmp_area[2] = $tmp_n_zero_nbr[2] * 2;
                    } else {
                        for ($i = 0; $i < 4; $i ++) {
                            $tmp_area[$i] = $tmp_n_zero_nbr[$i];
                        }
                    }
                }
                break;
            default:
                return $data_array;
                break;
        }
        $tmp_area_mbr = $tmp_area;
        if ($_) {
            for($i=0;$i<4;$i++){
                $tmp_area[$i] = $tmp_area_mbr[3-$i];
            }
        }
        return $tmp_area;
    }

    public static function add_rand_nbr($mtr)
    {
        $rst_tmp = array();
        $rst_bfr = $mtr;
        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                if ($rst_bfr[$i][$j] == 0) {
                    array_push($rst_tmp, array(
                        $i,
                        $j
                    ));
                }
            }
        }
        $rand = (int) rand(0, count($rst_tmp) - 1);
        $rst = $mtr;
        $rst[$rst_tmp[$rand][0]][$rst_tmp[$rand][1]] = Main::$ran[(int) rand(0, 1)];
        return $rst;
    }
    
    
    
    /**
     *
     * @param $mtr传入的二维数组， 用于显示结果            
     */
    public static function display($mtr)
    {
        echo '<table>' . "\n";
        for ($i = 0; $i < 4; $i ++) {
            echo '<tr>' . "\n";
            for ($j = 0; $j < 4; $j ++) {
                echo '<td id="'.$i.','.$j.'">' . $mtr[$i][$j] . '</td>' . "\n";
            }
            echo "</tr>" . "\n";
        }
        echo '</table>' . "\n";
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
        $res[$dimension[0]][$dimension[1]] = Main::$ran[(int) rand(0, 1)];
        return $res;
    }

    /**
     *
     * @param $mtr 数据集合            
     * @param $dirct 移动方式
     *            按照2048的规则移动数据
     */
    public static function move($mtr, $dirct)
    {
        // 这里我想换一个方式，不用Java的那种死板方法，
        // 思路是这样的 先把所有的移动抽象为向左移动，然后把所谓的左移动参数化
        // 当然啦，Java的移动方法还是比较可行的，经过了很多次的改动，但是我还是觉得挺麻烦的额
        
        // 详见 JavaTeachRespositry Game2048.Methods 类
        // 对于这个新的移动方式，参考Python实现的方式
        $tmp_rst = null; // 定义结果缓冲区
        $psh_mbr = null;
        $tmp = array(
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
        ); // 定义(行/列)缓冲区数组
        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                if ($dirct < 0) {
                    $psh_nbr = $mtr[$j][$i];
                } else {
                    $psh_nbr = $mtr[$i][$j];
                }
                $tmp[$i][$j] = $psh_nbr;
            }
        }
        // 如上，遍历数组，操作为上下操作的时候上下遍历写入缓冲数组
        // 操作为左右的时候 左右遍历写入缓冲数组
        if ((abs($dirct) == 2)) {
            $_ = false;
        } else {
            $_ = true;
        }
        for ($i = 0; $i < 4; $i ++) {
            $tmp[$i] = Main::move_line($tmp[$i], $_);
        }
        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                if ($dirct < 0) {
                    $tmp_rst[$j][$i] = $tmp[$i][$j];
                } else {
                    $tmp_rst[$i][$j] = $tmp[$i][$j];
                }
            }
        }
        return $tmp_rst;
    }
}

?>