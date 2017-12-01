module.exports = function(grunt){
  grunt.initConfig({
    sass: {
      options: {
        sourceMap: true
      },
      dist: {
        files: {
          'assets/css/style.css': 'assets/scss/index.scss'
        }
      }
    },
    watch: {
      scss: {
        files: ['assets/scss/*.scss'],
        tasks: ['sass']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['watch']);
  require('load-grunt-tasks')(grunt);
}
