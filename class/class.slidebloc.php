<?php
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

class slidebloc
{
	var $sid;
	var $name;
	var $imgurl;
	var $url;
	var $sql;
	var $config_in_database;
	var $table;

	function slidebloc($config=1)
	{
		if (is_array($config)){
			$this->sid=$config[0];
		}else{
			$this->sid=$config;}
		$db =& Database::getInstance();
		$this->table = $db->prefix('slideimg_items');
		$this->name= '';
		$this->imgurl='';
		$this->url='';
		if (is_array($config)){
			$this->sid=$config[0];
		}else{
			$this->sid=$config;}
		
		if($this->sid != 'new'){
			$this->getVal();
		}
//		echo "<br/> $config <br/>";
	}

	function getVal()
	{
		$db =& Database::getInstance();
//		var_dump ($this->sid) ;
		$this->sql = "SELECT * FROM ".$this->table." WHERE sid=".$this->sid;
//		echo $this->sql;echo "<br/";
		if ($resArray = $db->fetchRow($db->query($this->sql)))
		{
//		    var_dump($resArray);
			list($this->sid,$this->name,$this->imgurl,$this->url)=$resArray;
			$this->config_in_database=true;
		}
	}

	function storeVal()
	{
		$db =& Database::getInstance();

		if (!isset($this->config_in_database))
		{
			$this->sql = sprintf("INSERT INTO %s (sid ,name , imgurl , url) VALUES ('', \"%s\", \"%s\", \"%s\")",$this->table, $this->name,$this->imgurl,$this->url);
		}
		else
		{
			$this->sql = sprintf("UPDATE %s set name=\"%s\" ,imgurl=\"%s\" , url=\"%s\"  WHERE sid=\"%s\"",$this->table, $this->name, $this->imgurl, $this->url, $this->sid);
		}
		if (!$result = $db->query($this->sql))
		{
			
			return false;
		}
		return true;
	}

}
?>
