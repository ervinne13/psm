/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SGEntity {

    initFromLaravelModel(laravelModel) {
        var self = this;
        this.properties = this.properties ? this.properties : [];

        this.properties.forEach(p => {
            self[p] = laravelModel[p];
        });

    }

}