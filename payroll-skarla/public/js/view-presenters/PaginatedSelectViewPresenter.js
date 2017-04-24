
class PaginatedSelectViewPresenter {

    constructor($field, url) {
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

    getCompeleteParams(select2Params) {
        var completeParams = {
            q: select2Params.term,
            page: select2Params.page
        };

        //  append the value of set ajax params
        for (let name in this.ajaxParams) {
            completeParams[name] = this.ajaxParams[name];
        }
    }

    getSelect2Config() {

        var self = this;

        if (this.url == null) {
            throw new Error("PaginatedSelectViewPresenter url not yet set from inheriting class");
        }

        return {
            theme: "bootstrap",
            ajax: {
                url: self.url,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return self.getCompeleteParams(params);
                },
                processResults: function (results, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    var select2Data = [];
                    for (var i in results.data) {
                        results.data[i].id = results.data[i][self.idField];

                        if (typeof self.renderText === "function") {
                            results.data[i].text = self.renderText(results.data[i]);
                        } else {
                            results.data[i].text = results.data[i][self.textField];
                        }

                        console.log(results.data[i]);

                        select2Data.push(results.data[i]);
                    }

                    return {
                        results: select2Data,
                        pagination: {
                            more: (params.page * 15) < results.total
                        }
                    };
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
