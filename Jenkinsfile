pipeline {
  agent any
  stages {
    stage('install npm dependencies') {
      parallel {
        stage('install npm dependencies') {
          steps {
            sh 'npm install'
          }
        }
        stage('compile assets') {
          steps {
            sh 'npm run production'
          }
        }
      }
    }
  }
}