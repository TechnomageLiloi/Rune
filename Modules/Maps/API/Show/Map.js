let Map = {
    PCx: 0,
    PCy: 0,

    start: function ()
    {
        var tile = '.';
        let map = document.getElementById("map");
        let context = map.getContext("2d");
        context.font = "15px monospace";

        context.fillStyle = "black";
        context.fillRect(0,0,400,400);
        let size = 15;

        context.fillStyle = "white";

        let renderTile = function (x, y)
        {
            tile = Map.data.map[y + size][x + size];

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

        context.fillStyle = 'red';
        $('#side-left').html('');
        $.each(Map.data.objects, function(index, value) {
            // context.fillRect(0,0,400,400);
            context.fillText('o', 10 * (value.x + size) + 50, 10 * (value.y + size) + 50);

            if(Map.PCx == value.x && Map.PCy == value.y)
            {
                $('#side-left').html(JSON.stringify(value));
            }
        });

        for(let y=-size;y<=size;y++)
        {
            for(let x=-size;x<=size;x++)
            {
                if(Map.PCx === x && Map.PCy ===y)
                {
                    context.fillStyle = "yellow";
                    context.fillText('@', 10 * (x + size) + 50, 10 * (y + size) + 50);
                    context.fillStyle = "white";
                    continue;
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
        // alert(event.keyCode);

        switch (event.keyCode)
        {
            case 97: Map.PCx--; break;
            case 100: Map.PCx++; break;
            case 119: Map.PCy--; break;
            case 120: Map.PCy++; break;

            case 113: {Map.PCx--; Map.PCy--;}; break;
            case 99: {Map.PCx++; Map.PCy++;}; break;
            case 101: {Map.PCx++; Map.PCy--;}; break;
            case 122: {Map.PCx--; Map.PCy++;}; break;
        }

        Map.start();
    });

    Map.start();
})();