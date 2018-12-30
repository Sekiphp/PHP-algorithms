# PHP-algorithms

## Distribute data to groups of similar sizes
`function getSimilarGroups(int $groupCount, array $data): array`


`$groupCount` Count of groups

`$data` Data to distribute to groups (expected multidimensional array - example below)


Example of function call:
```
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
```


Output of example:

+ groupby - sum all groupby values from group
+ parts - names of the parts assigned to the group

```
Array
(
    [0] => Array
        (
            [groupby] => 4
            [parts] => Array
                (
                    [0] => key_4
                    [1] => key_3
                )

        )

    [1] => Array
        (
            [groupby] => 4
            [parts] => Array
                (
                    [0] => key_2
                    [1] => key_1
                )

        )

)
```