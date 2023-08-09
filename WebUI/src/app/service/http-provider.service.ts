import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { WebApiService } from './web-api.service';

var apiUrl = "http://localhost:8000";

var httpLink = {
  employee: apiUrl + "/api/employee"
}

@Injectable({
  providedIn: 'root'
})
export class HttpProviderService {

  constructor(private webApiService: WebApiService) { }

  public getAllEmployee(model: any = ''): Observable<any> {
    return this.webApiService.get(httpLink.employee + model);
  }

  public deleteEmployeeById(model: any): Observable<any> {
    return this.webApiService.delete(httpLink.employee + '/' + model, "");
  }

  public getEmployeeDetailById(model: any): Observable<any> {
    return this.webApiService.get(httpLink.employee + '/' + model);
  }

  public saveEmployee(model: any): Observable<any> {
    return this.webApiService.post(httpLink.employee, model);
  }

  public updateEmployee(model: any): Observable<any> {
    return this.webApiService.put(httpLink.employee+'/'+model.id, model);
  }
  
}
