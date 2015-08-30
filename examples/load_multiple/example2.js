define({
   init: function(config) {
      for(var k in config) {
         this.initialize(config[k]);
      }
   },
   initialize: function(options) {
      console.log("Initializing example2 with options", options);
   }
});
