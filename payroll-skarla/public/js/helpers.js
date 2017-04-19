
function showLoading(show) {
    if (show === false) {
        setTimeout(function () {
            $('.page-loader-wrapper').fadeOut();
        }, 50);
    } else {
        $('.page-loader-wrapper').show();
    }
}

const getParams = query => {
    if (!query) {
        return {};
    }

    return (/^[?#]/.test(query) ? query.slice(1) : query)
            .split('&')
            .reduce((params, param) => {
                let [key, value] = param.split('=');
                params[key] = value ? decodeURIComponent(value.replace(/\+/g, ' ')) : '';
                return params;
            }, {});
};
