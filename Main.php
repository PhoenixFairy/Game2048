<?php

/**
 * @access ��������Բο� :  JavaTeachRespositry�µ�  Game2048.Methods��
 * @author Axoford12
 * @see QQ 847072154
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
    {
        ;
    }

    /**
     *
     * @param $data_array �ƶ�����/��            
     * @param $_ �Ƿ񷴷����ƶ�
     *            �����ƶ�������
     */
    private static function move_line($data_array, $_)
    {
        ;
        // ˼·
        // �ҳ����еķ�������,ֱ�Ӱѷ������ƶ�
        $tmp_n_zero_nbr = array(); // ���建�����飬��¼������
        $tmp_clone = $data_array; // �����������ݿ�¡
        $tmp_area = array(
            0,
            0,
            0,
            0
        ); // �ƶ�������������
        for ($i = 0; $i < 4; $i ++) {
            if ($data_array[$i] != 0) {
                array_push($tmp_n_zero_nbr, $data_array[$i]);
            }
        }
        // ��������д�뵽����
        $count = count($tmp_n_zero_nbr);
        switch ($count) {
            case 1: // 1����������
                $tmp_area[0] = $tmp_n_zero_nbr[0]; // ֱ��д��������λ
                break;
            case 2: // 2����������
                if ($tmp_n_zero_nbr[0] != $tmp_n_zero_nbr[1]) { // �������ݲ���
                    for ($i = 0; $i < 2; $i ++) {
                        $tmp_area[$i] = $tmp_n_zero_nbr[$i]; // ����˳��ֵ��������
                    }
                } else { // �����������
                    $tmp_area[0] = $tmp_n_zero_nbr[0]; // �������ݺ�д�뻺������λ
                }
                break;
            case 3:
                // ��������������,���պϳ����ȼ��жϵ�����ϵ
                // ����μ� Game2048.Methods ���е�Commit.
                // ��������
                if ($tmp_n_zero_nbr[0] == $tmp_n_zero_nbr[1]) {
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2;
                    $tmp_area[1] = $tmp_n_zero_nbr[2];
                } elseif ($tmp_n_zero_nbr[1] == $tmp_n_zero_nbr[2]) {
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2;
                    $tmp_area[1] = $tmp_n_zero_nbr[2];
                } else {
                    for ($i=0;$i<3;$i++){
                        $tmp_area[$i] = $tmp_n_zero_nbr[$i]; 
                    }
                }
                break;
            case 4:
                
                break;
            default:
                return $data_array;
                break;
        }
        if (! $_) {
            ;
        }
    }

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
     * @param $dirct �ƶ���ʽ
     *            ����2048�Ĺ����ƶ�����
     */
    public static function move($mtr, $dirct)
    {
        // �������뻻һ����ʽ������Java���������巽����
        // ˼·�������� �Ȱ����е��ƶ�����Ϊ�����ƶ���Ȼ�����ν�����ƶ�������
        // ��Ȼ����Java���ƶ��������ǱȽϿ��еģ������˺ܶ�εĸĶ��������һ��Ǿ���ͦ�鷳�Ķ�
        
        // ��� JavaTeachRespositry Game2048.Methods ��
        // ��������µ��ƶ���ʽ���ο�Pythonʵ�ֵķ�ʽ
        $tmp = array(
            array(),
            array(),
            array(),
            array()
        );
        $psh_mbr = null;
        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                if ($dirct < 0) {
                    $psh_nbr = $mtr[$j][$i];
                } else {
                    $psh_nbr = $mtr[$i][$j];
                }
                $tmp[$i][$j] = $psh_nbr;
                array_push($not_zero_numbers, $psh_nbr);
            }
        }
        // ���ϣ��������飬����Ϊ���²�����ʱ�����±���д�뻺������
        // ����Ϊ���ҵ�ʱ�� ���ұ���д�뻺������
        if (abs($dirct) == 2) {
            $_ = false;
        } else {
            $_ = true;
        }
        if ($dirct == - 2) {
            ;
        } elseif ($dirct == - 1) {
            ;
        } elseif ($dirct == 2) {
            ;
        } elseif ($dirct == 1) {
            ;
        } else {}
        
        ;
    }
}

?>