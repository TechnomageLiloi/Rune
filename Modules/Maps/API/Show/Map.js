let Map = {
    start: function ()
    {
        let map = document.getElementById("map");
        let context = map.getContext("2d");
        context.moveTo(0, 0);
        context.lineTo(400, 400);
        context.stroke();
    }
};

(function () {
    Map.start();
})();