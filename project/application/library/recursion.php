<?php
class recursive
{
	protected $_sourceArr;
    
    public function __construct($sourceArr = null){
		$this->_sourceArr = $sourceArr;
	}
	public function buildArray($colums,$parents = 0)
    {
		$this->recursive($this->_sourceArr,$colums,$parents,1,$resultArr);
		return $resultArr;
	}
    
    public function buildMenu($colums,$parents = 0)
    {
		$this->createMenu($this->_sourceArr,$colums,$parents,1,$resultArr);
		return $resultArr;
	}
    
    
	public function recursive($sourceArr,$column = 'cate_parent',$parents = 0,$level = 1,&$resultArr){
		if(count($sourceArr)> 0){
			foreach($sourceArr as $key => $value){
				if($value['cate_parent'] == $parents){
					$value['level'] = $level;
					$resultArr[] = $value;
					$newParents = $value['cate_id'];
					unset($sourceArr[$key]);
					$this->recursive($sourceArr,$column,$newParents, $level + 1,$resultArr);
				}
			}
		}
	}
    public function createMenu($sourceArr,$column = 'cate_parent',$parents = 0,$level = 1,&$resultArr)
    {
        	if(count($sourceArr)> 0) {
            echo "<ul>";
			foreach($sourceArr as $key => $value){
		       echo "<li><a href=''>".$value['cate_name']."</a>";  	 
				if($value['cate_parent'] == $parents){
				     echo "<ul>";        
                     echo "<li><a href=''>".$value['cate_name']."</a></li>";
					$newParents = $value['cate_id'];
					unset($sourceArr[$key]);
					$this->createMenu($sourceArr,$column,$newParents, $level + 1,$resultArr);
                    
                    echo "</ul>";
				}
                 echo "</li>";
    			}
    		}
             echo "</ul>";
    }
}