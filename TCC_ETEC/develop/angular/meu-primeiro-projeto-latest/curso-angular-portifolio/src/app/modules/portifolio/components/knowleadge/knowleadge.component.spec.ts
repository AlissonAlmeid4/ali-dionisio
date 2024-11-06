import { ComponentFixture, TestBed } from '@angular/core/testing';

import { KnowleadgeComponent } from './knowleadge.component';

describe('KnowleadgeComponent', () => {
  let component: KnowleadgeComponent;
  let fixture: ComponentFixture<KnowleadgeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [KnowleadgeComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(KnowleadgeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
