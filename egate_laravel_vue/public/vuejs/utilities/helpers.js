export const serializeQuery = query => {
    return Object.keys(query)
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(query[key])}`)
        .join("&");
};

export const handleError = (error) => {
    const data = {
        data: error.response && error.response.data ? error.response.data : '',
        error: true
    }
    return data;
};

export function formatCurrency(num) {
    if (num !== undefined) {
        return parseFloat(num)
            .toString()
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    } else {
    }
}
