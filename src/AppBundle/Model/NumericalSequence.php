<?php
declare(strict_types=1);

namespace AppBundle\Model;

use Symfony\Component\Config\Definition\Exception\Exception;

class NumericalSequence
{
    /**
     * @param $n
     * @return int
     */
    public function maxFor(int $n): int
    {
        return max($this->sequence($n));
    }


    private function checkIfArray($n) {
        return is_array($n) ? 1 : 0;
    }

    public function elementOfSequence(int $n)
    {
        $this->sequence($n);
    }

    /**
     * @param $n
     * @return array
     */
    private function sequence(int $n): array
    {
        $result = [0, 1];

        if ($n > 1) {
            $result = $this->generateNextValues($n, $result);

        }

        return $result;
    }

    /**
     * @param $n
     * @param array $result
     * @return array
     */
    private function generateNextValues(int $n, array $result)
    {
        if (($n < 1 && $n < 99999)) {
            throw new Exception('n should be within range 1 < n < 99999');
            return;
        }

        for ($counter = 2; $counter <= $n; $counter++) {
           array_push($result, $this->valueFor($counter, $result));
        }

        return $result;
    }

    /**
     * @param $counter
     * @param $result
     * @return mixed
     */
    private function valueFor(int $counter, $result)
    {
        return $this->isOdd($counter) ? $this->valueForOdd($counter, $result) : $this->valueForEven($counter, $result);
    }

    /**
     * @param $counter
     * @param $result
     * @return mixed
     */
    private function valueForEven(int $counter, $result)
    {
        $i = $counter / 2;
        return $result[$i];
    }

    /**
     * @param $counter
     * @param $result
     * @return mixed
     */
    private function valueForOdd(int $counter, $result)
    {
        $i = ($counter - 1) / 2;
        return $result[$i] + $result[$i + 1];
    }

    /**
     * @param $i
     * @return bool
     */
    private function isOdd($i): bool
    {
        return $i % 2 != 0;
    }
}