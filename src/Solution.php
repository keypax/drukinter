<?php

class Solution
{
    /**
     * Main function that finds unique, single numbers in the array.
     *
     * @param array $input Array of numbers.
     * @return array Array of unique, single numbers.
     */
    public function findUniqueSingle(array $input): array {
        $counts = $this->countNumberOccurrences($input);
        return $this->findSingleOccurrences($input, $counts);
    }

    /**
     * Counts the occurrences of each number in the input array.
     *
     * @param array $input Array of numbers.
     * @return array Associative array where keys are numbers (string) and values are their counts.
     */
    private function countNumberOccurrences(array $input): array {
        $counts = [];

        foreach ($input as $number) {
            $key = (string) $number;
            if (!isset($counts[$key])) {
                $counts[$key] = 0;
            }
            $counts[$key]++;
        }

        return $counts;
    }

    /**
     * Finds numbers that occur exactly once in the array, based on the counts.
     *
     * @param array $input Array of numbers.
     * @param array $counts Array with counts of number occurrences.
     * @return array Array of numbers that occur only once.
     */
    private function findSingleOccurrences(array $input, array $counts): array {
        $result = [];

        foreach ($input as $number) {
            $key = (string) $number;
            if ($counts[$key] === 1) {
                $result[] = $number;
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->findUniqueSingle([1, 2, 3, 4, 1, 2, 3])); // [4]
print_r($solution->findUniqueSingle([11, 21, 33.4, 18, 21, 33.39999, 33.4])); // [11, 18, 33.39999]


