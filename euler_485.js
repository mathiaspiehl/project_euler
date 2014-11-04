function getDivisors(to) {
    var divisors = new Uint16Array(to + 1);

    for (var divisor = 1; divisor <= to; divisor++) {

        for (var i = divisor; i <= to; i += divisor) {
            divisors[i]++;
        }
    }

    return divisors;
}

function S(size, range) {
    console.time('total');
    console.time('getDivisors');
    var divisorsArray = getDivisors(size);
    console.timeEnd('getDivisors');

    console.time('find heighest and sum up');
    var rangeArray = divisorsArray.subarray(0, range);
    var currentMax = Math.max.apply(Math, rangeArray);
    var sum = currentMax;
    var durability = Array.prototype.lastIndexOf.call(rangeArray, currentMax) + 1;
    var fallbackDura = durability;
    var fallbackMax = 0;
    var current = 0;
    var called = 0;
    for (var i = range+1; i <= size; i++) {
        current = divisorsArray[i];

        if (current >= currentMax) {
            durability = range;
            currentMax = current;
        } else {
            durability--;
        }
        if (0 === durability) {
                //called++;
                rangeArray = divisorsArray.subarray(i - (range - 1), i + 1);
                currentMax = Math.max.apply(Math, rangeArray);
                durability = Array.prototype.lastIndexOf.call(rangeArray, currentMax) + 1;
            }
        sum += currentMax;

    }
    console.timeEnd('find heighest and sum up');
    console.timeEnd('total');
    console.log("Duarability was zero: " , called);
    return sum;
}
console.log('S(100 000 000,100 000) === ' + S(100000000, 100000));

