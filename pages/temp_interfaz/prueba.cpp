#include <iostream>
using namespace std;

void A(){
  cout<<"Hola"<<endl;
}
void B(void (*p)()){
  p();
}

int main(){
  //void (*p)()=A;
  B(A);
}