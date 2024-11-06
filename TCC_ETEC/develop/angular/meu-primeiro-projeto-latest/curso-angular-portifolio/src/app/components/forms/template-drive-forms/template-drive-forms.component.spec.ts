import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TemplateDriveFormsComponent } from './template-drive-forms.component';

describe('TemplateDriveFormsComponent', () => {
  let component: TemplateDriveFormsComponent;
  let fixture: ComponentFixture<TemplateDriveFormsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TemplateDriveFormsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(TemplateDriveFormsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
