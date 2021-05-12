<?php
	class BwighaneShell extends AppShell{
		public function main(){
			$name = '@bwighane';
			$array = str_split($name);
			if($array[0] == '@'){
				$newArray = array_slice($array, 1);
				$name = implode('', $newArray);
			}
			$this->out($name);
		}
	}
?>