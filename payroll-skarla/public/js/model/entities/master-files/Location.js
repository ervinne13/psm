
class Location extends SGEntity {

    constructor(laravelModel) {
        this.properties = ["code", "display_name", "company_code"];
        this.initFromLaravelModel(laravelModel);
    }

}
