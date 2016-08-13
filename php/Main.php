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
            (int) rand(0, 3),
            (int) rand(0, 3)
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
        // ˼·
        // �ҳ����еķ�������,ֱ�Ӱѷ������ƶ�
        $array = $data_array;
        if ($_) {
            for ($i = 0; $i < 4; $i ++) {
                $array[$i] = $data_array[3 - $i];
            }
        }
        $tmp_n_zero_nbr = array(); // ���建�����飬��¼������
        $tmp_area = array(
            0,
            0,
            0,
            0
        ); // �ƶ�������������
        for ($i = 0; $i < 4; $i ++) {
            if ($array[$i] != 0) {
                array_push($tmp_n_zero_nbr, $array[$i]);
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
                    $tmp_area[0] = $tmp_n_zero_nbr[0] * 2; // �������ݺ�д�뻺������λ
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
                    $tmp_area[0] = $tmp_n_zero_nbr[0];
                    $tmp_area[1] = $tmp_n_zero_nbr[2] * 2;
                } else {
                    for ($i = 0; $i < 3; $i ++) {
                        $tmp_area[$i] = $tmp_n_zero_nbr[$i];
                    }
                }
                break;
            case 4:
                // �ĸ���������,�����������ȼ��жϵ�����ϵд������
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
     * @param $mtr����Ķ�ά���飬 ������ʾ���            
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
        $res[$dimension[0]][$dimension[1]] = Main::$ran[(int) rand(0, 1)];
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
        $tmp_rst = null; // ������������
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
        ); // ����(��/��)����������
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
        // ���ϣ��������飬����Ϊ���²�����ʱ�����±���д�뻺������
        // ����Ϊ���ҵ�ʱ�� ���ұ���д�뻺������
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