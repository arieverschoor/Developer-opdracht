<?php
class Pigeon {

    private $owner;
    private $name;   // Name must be unique!!
    private $weight;
    private $age;

    function __construct($Owner, $Name, $Weight, $Age) {
        $this->owner = $Owner;
        $this->name  = $Name;
        $this->weight = $Weight;
        $this->age = $Age;
    }

    private function setOwner($Owner) {
        $this->owner = $Owner;
    }

    private function getOwner() {
        return $this->owner;
    }

    private function setName($Name) {
        $this->name = $Name;
    }

    private function getName() {
        return $this->name;
    }

    private function setWeight($Weight) {
        $this->weight = $Weight;
    }

    private function getWeight() {
        return $this->weight;
    }

    private function setAge($Age) {
        $this->age = $Age;
    }

    private function getAge() {
        return $this->age;
    }
}

class PigeonList {

    private $pigeons = array();
    private $pigeonCount = 0;
    
    public function __construct() {
    }

    public function getPigeonCount() {
        return $this->pigeonCount;
    }

    public function setPigeonCount($newPigeonCount) {
        $this->pigeonCount = $newPigeonCount;
    }

    public function getBook($bookNumberToGet) {
      if ( (is_numeric($bookNumberToGet)) && 
           ($bookNumberToGet <= $this->getBookCount())) {
           return $this->books[$bookNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addPigeon(Pigeon $pigeonIn) {
      $this->setPigeonCount($this->getPigeonCount() + 1);
      $this->pigeon[$this->getPigeonCount()] = $pigeonIn;
      return $this->getPigeonCount();
    }
    public function removePigeon(Pigeon $pigeonIn) {
      $counter = 0;
      while (++$counter <= $this->getPigeonCount()) {
        if ($pigeonIn->getName() == 
          $this->pigeons[$counter]->getName())   // Get name of pigeon (must be unique to fetch desired  one) 
          {
            for ($x = $counter; $x < $this->getPigeonCount(); $x++) {
              $this->pigeons[$x] = $this->pigeons[$x + 1];
          }
          $this->setPigeonCount($this->getPigeonCount() - 1);
        }
      }
      return $this->getPigeonCount();
    }

}

class PigeonListIterator {
    protected $pigeonList;
    protected $currentPigeon = 0;

    public function __construct(PigeonList $pigeonListIn) {
      $this->pigeonList = $pigeonListIn;
    }
    public function getCurrentPigeon() {
      if (($this->currentPigeon > 0) && 
          ($this->pigeonList->getPigeonCount() >= $this->currentPigeon)) {
        return $this->pigeonList->getPigeon($this->currentPigeon);
      }
    }
    public function getNextPigeon() {
      if ($this->hasNextPigeon()) {
        return $this->pigeonList->getPigeon(++$this->currentPigeon);
      } else {
        return NULL;
      }
    }
    public function hasNextPigeon() {
      if ($this->pigeonList->getPigeonCount() > $this->currentPigeon) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}

class PigeonListReverseIterator extends PigeonListIterator {
    public function __construct(PigeonList $pigeonListIn) {
      $this->pigeonList = $pigeonListIn;
      $this->currenPigeon = $this->pigeonList->getPigeonCount() + 1;
    }
    public function getNextPigeon() {
      if ($this->hasNextPigeon()) {
        return $this->pigeonList->getBook(--$this->currentPigeon);
      } else {
        return NULL;
      }
    }
    public function hasNextPigeon() {
      if (1 < $this->currentPigeon) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}
?>