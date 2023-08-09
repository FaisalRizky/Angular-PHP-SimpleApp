#################
UI Server Angular
Pre-requisite
	1.Angular CLI (https://angular.io/cli)
	2.Npm

Step
1. Go to Root projects
2. Run npm install on terminal/powershell/cmd
3. Run ng serve on
4. Open your browser go to http://localhost:4200

Note : 
Make sure to run API Server on localhost:8000, if API server is in different than localhost:8000, Please change the following file 
'src\app\service\http-provider.service.ts' 
line 5 change value to your API Server Running Port