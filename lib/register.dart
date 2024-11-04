import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class RegisterScreen extends StatelessWidget {
  final TextEditingController usernameController = TextEditingController();
  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  RegisterScreen({super.key});

  Future<void> registerUser() async {
    final response = await http.post(
      Uri.parse('http://localhost/flutter_auth_api/register.php'),
      body: json.encode({
        'username': usernameController.text,
        'email': emailController.text,
        'password': passwordController.text,
      }),
    );

    final data = json.decode(response.body);
    if (data['status'] == 'success') {
      // Berhasil
    } else {
      // Gagal
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Register')),
      body: Column(
        children: [
          TextField(
              controller: usernameController,
              decoration: const InputDecoration(labelText: 'Username')),
          TextField(
              controller: emailController,
              decoration: const InputDecoration(labelText: 'Email')),
          TextField(
              controller: passwordController,
              decoration: const InputDecoration(labelText: 'Password')),
          ElevatedButton(
              onPressed: registerUser, child: const Text('Register')),
        ],
      ),
    );
  }
}
