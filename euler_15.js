function fak(num) {
    if (num === 0) {
        return 1;
    }
    return num * fak(num-1);
}

function grid(size) {
    var routes = 0;
    var binomialRow = size*2;
    var n = fak(binomialRow);
    var k = fak(size);
    routes = n/k/k;
    
    return routes;
}

console.log('grid(20) === ' + grid(4));


