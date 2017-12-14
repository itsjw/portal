pipeline {
  agent {
    node {
      label 'node'
    }
    
  }
  stages {
    stage('install npm dependencies') {
      parallel {
        stage('install npm dependencies') {
          steps {
            withNPM() {
              sh 'npm install'
            }
            
          }
        }
        stage('compile assets') {
          steps {
            withNPM() {
              sh 'npm run production'
            }
            
          }
        }
      }
    }
  }
}