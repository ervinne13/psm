/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Company extends SGEntity {

    constructor(laravelModel) {
        this.properties = ["code", "display_name"];
        this.initFromLaravelModel(laravelModel);
        this.initLocations(laravelModel);
    }

    initLocations(laravelModel) {
        var self = this;
        this.locations = [];

        if (typeof laravelModel.locations === 'Array') {
            laravelModel.locations.forEach(l => {
                self.locations.push(new Location(l));
            });
        }
    }

}