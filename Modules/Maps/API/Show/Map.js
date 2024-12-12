let Map = {
    PCx: 15,
    PCy: 15,
    size: 15,

    start: function ()
    {
        var tile = '.';
        let map = document.getElementById("map");
        let context = map.getContext("2d");
        context.font = "15px monospace";

        context.fillStyle = "black";
        context.fillRect(0,0,400,400);
        const size = 15;

        let renderTile = function (x, y)
        {
            if(_.isUndefined(Map.data.map[y + Map.PCy]) || _.isUndefined(Map.data.map[y + Map.PCy][x + Map.PCx]))
            {
                return;
            }

            tile = Map.data.map[y + Map.PCy][x + Map.PCx];

            switch (tile)
            {
                case '.':
                case 'T': context.fillStyle = "lime"; break;
                case '#': context.fillStyle = "silver"; break;
                case ',':
                default: context.fillStyle = "white";
            }

            context.fillText(tile, 10 * (x + size) + 50, 10 * (y + size) + 50);
        };

        for(let y=-size;y<=size;y++)
        {
            for(let x=-size;x<=size;x++)
            {
                // if(Map.PCx === x && Map.PCy ===y)
                // {
                //     context.fillStyle = "yellow";
                //     context.fillText('@', 10 * (x + size) + 50, 10 * (y + size) + 50);
                //     context.fillStyle = "white";
                //     continue;
                // }

                // tile = Map.data.map[y + size][x + size];
                // context.fillText(tile, 10 * (x + size) + 50, 10 * (y + size) + 50);
                renderTile(x, y);
            }
        }

        context.stroke();
    }
};

(function () {
    $("body").on( "keypress", function( event ) {
        var x = Map.PCx;
        var y = Map.PCy;

        switch (event.keyCode)
        {
            case 97: x--; break;
            case 100: x++; break;
            case 119: y--; break;
            case 120: y++; break;

            case 113: {x--; y--;}; break;
            case 99: {x++; y++;}; break;
            case 101: {x++; y--;}; break;
            case 122: {x--; y++;}; break;
        }

        // if(
        //     Map.data.map[y + Map.size][x + Map.size] === '#' ||
        //
        //     x < -Map.size ||
        //     x > Map.size ||
        //     y < -Map.size ||
        //     y > Map.size
        // )
        // {
        //     return;
        // }

        Map.PCx = x;
        Map.PCy = y;

        Map.start();
    });

    Map.start();
})();