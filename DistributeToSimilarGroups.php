<?php
/**
 * Distribute data to groups of similar sizes
 *
 * @param  int    $groupCount Count of groups
 * @param  array  $data Data to distribute to groups
 * @return array  Sorted data to groups with similar sizes
 */
function getSimilarGroups(int $groupCount, array $data): array
{
    $ret = [];

    if ($groupCount < 2) {
        throw new CannotCreateLessThenTwoGroupsException();
    }

    // make groups
    for ($i = 0; $i < $groupCount; $i++) {
        $ret[] = [
            'groupby' => 0,
            'parts' => [],
        ];
    }

    // sort input data by key (DESC)
    usort($data, function ($item1, $item2) {
        return $item1['groupby'] <= $item2['groupby'];
    });

    // distribute sorted data to groups
    foreach ($data as $item) {
        $counts = array_column($ret, 'groupby');
        $index = array_search(min($counts), $counts, true); // index of minValue

        $ret[$index]['groupby'] += $item['groupby'];
        $ret[$index]['parts'][] = $item['key'];
    }

    return $ret;
}

// example: print output
print_r(getSimilarGroups(2, [
    [
        'groupby' => 2,
        'key' => 'key_1'
    ],
    [
        'groupby' => 2,
        'key' => 'key_2'
    ],
    [
        'groupby' => 1,
        'key' => 'key_3'
    ],
    [
        'groupby' => 3,
        'key' => 'key_4'
    ],
]));

