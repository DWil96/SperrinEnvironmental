
if (document.getElementById('map')) {
    mapboxgl.accessToken = 'pk.eyJ1Ijoic3BlcnJpbnNlcGFyYXRvcnMiLCJhIjoiY21yanFjMXo3MDhsNDJ4c2V2d2c1b3R3cyJ9.pKm47D-EZMnsWXeYlYsdwA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [-7.285954, 54.680239],
        zoom: 14,
        cooperativeGestures: true
    });

    const geojson = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-7.285954, 54.680239]
                }
            }
        ]
    };

    for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
    }
}
