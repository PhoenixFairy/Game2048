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
     * @var $ran ������ɵ�����
     */
    private static $ran = array(
        2,
        4
    );

    /**
     *
     * @var score���ڻ���
     */
    private static $score = 0;

    /**
     * ��ȡһ���������
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
     * @param $mtr ����Ķ�ά��������
     *            �������ά�������������
     * @see <<2048����>>
     */
    private static function addRanNumber($mtr)
    {}

    /**
     *
     * @param $mtr����Ķ�ά���飬 ������ʾ���            
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
     * ��ʼ��һ����ά���顣�������
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
     * @param $mtr ���ݼ���
     *            ����2048�Ĺ����ƶ�����
     */
    public static function move($mtr)
    {
        ;
    }
}

?>