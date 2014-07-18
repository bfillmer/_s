module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      default: {
        options: {
          cleancss: true
        },
        files: {
          'assets/css/style.css': 'assets/less/style.less'
        }
      }
    },
    watch: {
      files: 'assets/less/*',
      tasks: ['less']
    }
  });

  // Load LESS parser.
  grunt.loadNpmTasks('grunt-contrib-less');
  // Load task watcher.
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['less']);
  // Watch task(s).
  grunt.registerTask('observe', ['watch']);

};