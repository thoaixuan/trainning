import { useState, useEffect } from 'react';
import axios from 'axios';

const useFetch = (url) => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);

    useEffect(() => {
        setLoading(true);
        axios({
            method: "GET",
            url: url,
            qs: {
                'start': '1',
                'limit': '100',
                'convert': 'USD'
            },
            headers: {
                'Accepts': 'application/json',
                'X-CMC_PRO_API_KEY': 'ad59e4f8-89b3-49da-8721-c6df10853e5d'
            },
            json: true,
        }).then(function (response) {
            setData(response.data.data);
            console.log(response.data.data);
        }).catch(function (err) {
            setError(err)
        }).finally(() => {
            setLoading(false);
        });
    }, [url]);
    return { data, loading, error };
}

export default useFetch;
