let Map = {
    PCx: 1,
    PCy: 1,
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

            if(
                !_.isUndefined(Map.data.items[y+ Map.PCy]) &&
                !_.isUndefined(Map.data.items[y+ Map.PCy][x+ Map.PCx])
            )
            {
                Map.data.items[y+ Map.PCy][x+ Map.PCx].forEach(function(item) {
                    context.fillStyle = "#7adcff";
                    context.fillText('o', 10 * (x + size) + 50, 10 * (y + size) + 50);
                    context.fillStyle = "white";
                });
                return;
            }

            tile = Map.data.map[y + Map.PCy][x + Map.PCx];

            switch (tile)
            {
                case '.':
                case 'T': context.fillStyle = "lime"; break;
                case '#': context.fillStyle = "silver"; break;
                case '~': context.fillStyle = "blue"; break;
                case '-': context.fillStyle = "#87CEEB"; tile = '~'; break;
                case ',':
                default: context.fillStyle = "white";
            }

            context.fillText(tile, 10 * (x + size) + 50, 10 * (y + size) + 50);
        };

        $('#side-left').html('');

        for(let y=-size;y<=size;y++)
        {
            for(let x=-size;x<=size;x++)
            {
                if(0 === x && 0 === y)
                {
                    context.fillStyle = "yellow";
                    context.fillText('@', 10 * (x + size) + 50, 10 * (y + size) + 50);
                    context.fillStyle = "white";
                    continue;
                }

                if(
                    !_.isUndefined(Map.data.items[Map.PCy]) &&
                    !_.isUndefined(Map.data.items[Map.PCy][Map.PCx])
                )
                {
                    Map.data.items[Map.PCy][Map.PCx].forEach(function(item) {
                        // $('#side-left').html(JSON.stringify(item));
                        Rune.Maps.Inventory.parseItem(item);
                    });
                }

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

            case 116: {

                if(
                    !_.isUndefined(Map.data.items[Map.PCy]) &&
                    !_.isUndefined(Map.data.items[Map.PCy][Map.PCx])
                )
                {
                    Map.data.items[Map.PCy][Map.PCx].forEach(function(item) {
                        Rune.Maps.Inventory.put(item.key_item)
                    });
                }

                return ;
            }; break;
        }

        if(
            _.isUndefined(Map.data.map[y]) ||
            _.isUndefined(Map.data.map[y][x]) ||
            Map.data.map[y][x] === '#' ||
            Map.data.map[y][x] === '~'
        )
        {
            return;
        }

        if(Map.data.map[y][x] === 'T' && Math.floor(Math.random() * 10))
        {
            return;
        }

        Map.PCx = x;
        Map.PCy = y;

        Map.start();
    });

    Map.start();
})();