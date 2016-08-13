<?php

/**
 * 
 * @author Axoford12
 *
 */
class Page
{

    public $data;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function do_html_style()
    {
        $data = $this->data;
        for ($i = 0; $i < count($data['css']); $i ++) {
            echo '<link rel="stylesheet" type="text/css" href="' . $data['css'][$i] . '">';
        }
    }

    /**
     *
     * @param
     *            data
     *            the data of this table.
     * @return a String var
     *         Exanple : <tr><td></td><tr>
     */
    public static function get_html_table($data)
    {
        $res = "<table>";
        for ($i = 0; $i < count($data['tr']); $i ++) {
            $res = $res . '<tr>' . "\n";
            for ($j = 0; $j < count($data['tr'][$i]); $j ++) {
                $res = $res . '<td id="' . $i . ',' . $j . '">' . $data['tr'][$i][$j] . '</td>';
            }
            $res = $res . '</tr>' . "\n";
        }
        $res = $res . "</table>" . "\n" . "</div>";
        $res = '<div align="' . $data[ 'align'].'"id=' . $data['id'] . '>' . $res;
        return $res;
    }

    /**
     */
    public function do_html()
    {
        ?>
<html>
<head>
		<?php $this->do_html_style()?>
		<title><?php echo $this->data[ 'title'] ?></title>
        <?php
        for ($i = 0; $i < count($this->data['scripts']); $i ++) {
            
            echo '<script src="' . $this->data['scripts'][$i] . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }
        ?>
	</head>
	<body>
	
        <?php echo $this->data['body']."\n"?>
	</body>
</html>
<?php
    }
}
