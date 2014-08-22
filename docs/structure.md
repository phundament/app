Directory Structure
===================

```
init-env/			    environment-based config templates (default overrides)
docs/                   developer documentation
common
	config/				configurations used in all applications
	mail/				view files for e-mails
	models/				model classes used in all applications
	tests/				various tests for objects that are common among applications
console
	config/				console configurations
	controllers/		console controllers (commands)
	migrations/			database migrations
	models/				console-specific model classes
	runtime/			files generated during runtime
	tests/				various tests for the console application
backend
	assets/				application assets such as JavaScript and CSS
	config/				backend configurations
	controllers/		Web controller classes
	models/				backend-specific model classes
	runtime/			files generated during runtime
	tests/				various tests for the backend application
	views/				view files for the Web application
	web/				the entry script and Web resources
frontend
	assets/				application assets such as JavaScript and CSS
	config/				frontend configurations
	controllers/		Web controller classes
	models/				frontend-specific model classes
	runtime/			files generated during runtime
	tests/				various tests for the frontend application
	views/				view files for the Web application
	web/				the entry script and Web resources
vendor/					dependent 3rd-party packages
```

