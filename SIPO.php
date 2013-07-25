<?php
class SIPO {
	private $organization;
	private $year;
	private $month;
	private $date;
	private $lines = array();

	public function __construct($organization, $year, $month){
		$this->organization = $organization;
		$this->year = $year;
		$this->month = $month;
		$this->date = date("dmY", time());
	}

	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	public function getDate(){
		return $this->date;
	}


	public function getPeriod(){
		return sprintf("%02d%04d",$this->month, $this->year);
	}


	public function addLine(SIPO_Line $line) {
		$this->lines[] = $line;
		return $this;
	}

	public function pruvodka(){
		//#organizace##obdobi##radku##datum#
		$res = sprintf("%d%s% 8d%s\r\n",$this->organization,$this->getPeriod(), count($this->lines), date("dmY", time()));
		return $res;
	}

        public function __toString()
        {
            $res = "";
            foreach ($this->lines as $line){
                $res .= $line;
            }
            return $res;
        }

        public function getOrganization()
        {
            return $this->organization;
        }

        public function getYear()
        {
            return $this->year;
        }

        public function getMonth()
        {
            return $this->month;
        }

        public function getLines()
        {
            return $this->lines;
        }



}
