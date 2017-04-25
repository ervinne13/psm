
class PaginatedSelectViewPresenter {

    constructor(url) {
        this.url = url;
        this.idField = "id";
        this.textField = "text";

        this.renderText = null;

        this.ajaxParams = {};
    }

    applyTo($field) {
        let config = this.getSelect2Config();
        $($field).select2(config);
    }

    /**
     * API that allows for adding ajax params before it's sent. Useful for extra
     * filtering of the results
     * @param {type} originalParams
     * @returns {PaginatedSelectViewPresenter.getCompeleteParams.completeParams}
     */
    getCompeleteParams(originalParams) {
        var completeParams = {
            q: originalParams.term,
            page: originalParams.page
        };

        //  append the value of set ajax params
        for (let name in this.ajaxParams) {
            completeParams[name] = this.ajaxParams[name];
        }

        return completeParams;
    }

    resultProcessor(results, params) {

        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        var options = [];
        for (var i in results.data) {
            results.data[i].id = results.data[i][this.idField];

            if (typeof this.renderText === "function") {
                results.data[i].text = this.renderText(results.data[i]);
            } else {
                results.data[i].text = results.data[i][this.textField];
            }

            options.push(results.data[i]);
        }

        return {
            results: options,
            pagination: {
                more: (params.page * 15) < results.total
            }
        };
    }

    getSelect2Config() {

        var self = this;

        if (!this.url) {
            throw new Error("PaginatedSelectViewPresenter url not yet set from inheriting class");
        }

        return {
            theme: "bootstrap",
            ajax: {
                url: self.url,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return self.getCompeleteParams(params)
                },
                processResults: function (results, params) {
                    //  contain in an extra function to maintain context (this variable)
                    return self.resultProcessor(results, params);
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work            
//            templateResult: formatRepo, // omitted for brevity, see the source of this page
//            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        };
    }

}
