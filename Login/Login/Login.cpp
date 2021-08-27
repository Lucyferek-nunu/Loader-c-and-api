#define CURL_STATICLIB
#pragma comment (lib, "curl/libcurl.lib")

#include <iostream>
#include "curl/curl.h"
#include "main.h"

int main()
{
    std::string username;
    std::string password;

    std::string response;

login:
    system("cls");
    std::cout << "Siema" << std::endl << std::endl;
    std::cout << "Username: ";
    std::cin >> username;

    std::cout << "\n\nPassword: ";
    std::cin >> password;


    response = Login(username, password);

    std::cout << response;
    system("pause");

    goto auth;
auth:
     if (response == "true")
    {
        system("cls");
        std::cout << "Super" << std::endl;
        system("pause");
        goto welcome;
    }
    else { // zle
        system("cls");
        std::cout << "Zle" << std::endl;
        system("pause");
        goto login;
    }


welcome:
    system("cls");
    std::cout << "Panel" << std::endl;
    system("pause");
}
