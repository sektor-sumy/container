<?
/**
 * Алгоритм «Первый подходящий» (First Fit)
 */

class AlgoFirstFit extends AlgoPackage {
  public $name = 'Первый подходящий (First Fit)';
  public function process(OrderUnit $orderUnit) {
    $this->packageUnit = new PackageUnit();
    $unit =& $this->packageUnit;
    
    $step = 0; $cntNum = 0;
    foreach($orderUnit as $weight) {
      $step++;
      if ($step == 1) {
        $unit->put($cntNum, $weight);
        } else {
        for($i=0; $i<=$cntNum; $i++) {
          $result = ($unit->put($i, $weight));
          if ($result) break;
          }
        if (!$result) {
          $cntNum++;
          $unit->put($cntNum, $weight);
          }
        }
      }
    }
  }
