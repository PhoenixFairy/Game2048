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

    public function __construct($data){
        $this->data = $data;
    }
    
	private function do_html_style(){
		$data = $this->data;
		for($i=0;$i<count($data['css']);$i++){			
		 echo '<link rel="stylesheet" type="text/css" href="'.$data['css'][$i].'">';
		}
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
            
            echo '<script src="' . $this->data['scripts'][$i] . '" type="text/javascript" charset="utf-8"></script>'."\n";
        }
        ?>
	</head>
        <?php echo $this->data['body']."\n"?>
</html>
<?php
    }
}
