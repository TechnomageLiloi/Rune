let Map = {
    start: function ()
    {
        var PCx = 0;
        var PCy = 0;

        let map = document.getElementById("map");
        let context = map.getContext("2d");
        context.font = "15px monospace";

        context.fillStyle = "black";
        context.fillRect(0,0,400,400);
        let size = 15;

        context.fillStyle = "white";
        for(let y=-size;y<=size;y++)
        {
            for(let x=-size;x<=size;x++)
            {
                if(PCx === x && PCy ===y)
                {
                    context.fillText('@', 10 * (x + size) + 50, 10 * (y + size) + 50);
                    continue;
                }

                context.fillText('.', 10 * (x + size) + 50, 10 * (y + size) + 50);
            }
        }

        context.stroke();
    }
};

(function () {
    Map.start();
})();