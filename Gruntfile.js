module.exports = function(grunt) {
	grunt.initConfig( {
		pkg: grunt.file.readJSON('package.json'),
		/* sass task */
		sass: {
			dev: {
				options: {
					style: 'expanded',
					sourcemap: 'none',
					require: 'susy'
				},
				files: {
					'compiled/style-human.css': 'sass/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
					require: 'susy'
				},
				files: {
					'compiled/style.css': 'sass/style.scss'
				}
			}
		},
		/* autoprefixer */
		postcss: {
			options: {
				processors: [
      				require('autoprefixer')({browsers: ['last 2 versions']})
    			]
			},
			// prefix all files
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'compiled/*.css',
				dest: ''
			}
		},
		/* watch task */
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'postcss']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.registerTask('default', ['watch']);
}
