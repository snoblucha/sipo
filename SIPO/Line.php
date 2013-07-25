<?php
class SIPO_Line {
	/**
	 * Owner of this line
	 * @var sipo
	 */
	private $owner;

	private $amount;
	private $sipo_number;
	private $text;
	private $kod = 24;

	public function __construct(SIPO $owner, $sipo_number, $amount, $text = ''){
		$this->owner = $owner;
		$this->sipo_number = $sipo_number;
		$this->amount = $amount;
                $this->setText($text);
	}

	public static function factory(SIPO $owner, $sipo_number, $amount, $text = ''){
		return new sipo_line($owner, $sipo_number, $amount, $text);
	}

	public function setText($text){
		$this->text = $text;
	}

	public function getText(){
		return $this->text;
	}

        public function getAmount()
        {
            return $this->amount;
        }

        public function setAmount($amount)
        {
            $this->amount = $amount;
        }

        public function getKod()
        {
            return $this->kod;
        }

        public function setKod($kod)
        {
            $this->kod = $kod;
        }


	public function __toString(){
		//01#obdobi#1#sipo##organizace#      #kod##predpis#         #text#

		$res = sprintf("01%s1%s%s      % 3d% 9.2f         %-18s\r\n",
						$this->owner->getPeriod(),
						$this->sipo_number,
						$this->owner->getOrganization(),
						$this->kod,
						$this->amount,
						$this->text
						);
		return $res;

	}

}
