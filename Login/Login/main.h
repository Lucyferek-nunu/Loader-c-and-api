#define CURL_STATICLIB
#pragma comment (lib, "curl/libcurl.lib")

#include <iostream>
#include "curl/curl.h"


std::string Login(std::string uname, std::string pass);