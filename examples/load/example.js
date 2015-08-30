define({
   init: function(config) {
      for(var k in config) {
         this.initialize(config[k]);
      }
   },
   initialize: function(options) {
      console.log("Initializing with options", options);
   }
});
